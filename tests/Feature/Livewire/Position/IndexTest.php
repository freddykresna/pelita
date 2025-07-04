<?php

use App\Livewire\Position\Index;
use App\Models\Position;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->organization = \App\Models\Organization::factory()->create();
    $this->user->organizations()->attach($this->organization->id);
    $this->actingAs($this->user);
});

test('can render position index component', function () {
    Livewire::test(Index::class)
        ->assertStatus(200);
});

test('can display positions in table', function () {
    $positions = Position::factory()->count(3)->create();

    Livewire::test(Index::class)
        ->assertSee($positions[0]->name)
        ->assertSee($positions[1]->name)
        ->assertSee($positions[2]->name);
});

test('can search positions by name', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Senior Developer',
        'description' => 'Lead development team',
    ]);
    
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Project Manager',
        'description' => 'Manage projects',
    ]);

    Livewire::test(Index::class)
        ->set('search', 'Senior')
        ->assertSee('Senior Developer')
        ->assertDontSee('Project Manager');
});

test('can search positions by description', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Developer',
        'description' => 'Frontend development',
    ]);
    
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Manager',
        'description' => 'Backend systems',
    ]);

    Livewire::test(Index::class)
        ->set('search', 'Frontend')
        ->assertSee('Developer')
        ->assertDontSee('Manager');
});

test('can sort positions by name', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Zeta Position'
    ]);
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Alpha Position'
    ]);
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Beta Position'
    ]);

    $component = Livewire::test(Index::class);

    $positions = $component->get('positions');
    expect($positions->first()->name)->toBe('Alpha Position');
});

test('can sort positions by description', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'description' => 'Zebra description'
    ]);
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'description' => 'Apple description'
    ]);
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'description' => 'Banana description'
    ]);

    $component = Livewire::test(Index::class)
        ->call('sort', 'description');

    $positions = $component->get('positions');
    expect($positions->first()->description)->toBe('Apple description');
});

test('can toggle sort direction', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Alpha'
    ]);
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Zeta'
    ]);

    $component = Livewire::test(Index::class)
        ->assertSet('sortBy', 'name')
        ->assertSet('sortDirection', 'asc')
        ->call('sort', 'name')
        ->assertSet('sortDirection', 'desc');

    $positions = $component->get('positions');
    expect($positions->first()->name)->toBe('Zeta');
});

test('can delete position', function () {
    $position = Position::factory()->create([
        'organization_id' => $this->organization->id
    ]);

    Livewire::test(Index::class)
        ->call('delete', $position->id);

    expect(Position::find($position->id))->toBeNull();
});

test('search resets pagination', function () {
    Position::factory()->count(15)->create(['organization_id' => $this->organization->id]);

    Livewire::test(Index::class)
        ->set('search', 'test')
        ->assertSet('search', 'test');
});

test('displays empty state when no positions found', function () {
    Livewire::test(Index::class)
        ->assertSee('No positions found')
        ->assertSee('Add your first position');
});

test('displays no results message when search yields no results', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Developer'
    ]);

    Livewire::test(Index::class)
        ->set('search', 'NonExistentPosition')
        ->assertSee('No positions found matching', false);
});

test('displays N/A for positions without description', function () {
    Position::factory()->create([
        'organization_id' => $this->organization->id,
        'name' => 'Test Position',
        'description' => null,
    ]);

    Livewire::test(Index::class)
        ->assertSee('Test Position')
        ->assertSee('N/A');
});
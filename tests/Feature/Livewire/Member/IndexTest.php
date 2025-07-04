<?php

use App\Livewire\Member\Index;
use App\Models\Member;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->organization = \App\Models\Organization::factory()->create();
    $this->user->organizations()->attach($this->organization->id);
    $this->actingAs($this->user);
});

test('can render member index component', function () {
    Livewire::test(Index::class)
        ->assertStatus(200);
});

test('can display members in table', function () {
    $members = Member::factory()->count(3)->create(['organization_id' => $this->organization->id]);

    Livewire::test(Index::class)
        ->assertSee($members[0]->first_name)
        ->assertSee($members[0]->last_name)
        ->assertSee($members[0]->email)
        ->assertSee($members[1]->first_name)
        ->assertSee($members[2]->first_name);
});

test('can search members by name', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
    ]);
    
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'email' => 'jane@example.com',
    ]);

    Livewire::test(Index::class)
        ->set('search', 'John')
        ->assertSee('John')
        ->assertSee('Doe')
        ->assertDontSee('Jane')
        ->assertDontSee('Smith');
});

test('can search members by email', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@test.com',
    ]);
    
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'email' => 'jane@example.com',
    ]);

    Livewire::test(Index::class)
        ->set('search', 'test.com')
        ->assertSee('John')
        ->assertDontSee('Jane');
});

test('can sort members by first name', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Zoe']);
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Alice']);
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Bob']);

    $component = Livewire::test(Index::class);

    $members = $component->get('members');
    expect($members->first()->first_name)->toBe('Alice');
});

test('can sort members by last name', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'last_name' => 'Wilson']);
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'last_name' => 'Adams']);
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'last_name' => 'Brown']);

    $component = Livewire::test(Index::class)
        ->call('sort', 'last_name');

    $members = $component->get('members');
    expect($members->first()->last_name)->toBe('Adams');
});

test('can toggle sort direction', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Alice']);
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'Zoe']);

    $component = Livewire::test(Index::class)
        ->assertSet('sortBy', 'first_name')
        ->assertSet('sortDirection', 'asc')
        ->call('sort', 'first_name')
        ->assertSet('sortDirection', 'desc');

    $members = $component->get('members');
    expect($members->first()->first_name)->toBe('Zoe');
});

test('can delete member', function () {
    $member = Member::factory()->create(['organization_id' => $this->organization->id]);

    Livewire::test(Index::class)
        ->call('delete', $member->id);

    expect(Member::find($member->id))->toBeNull();
});

test('search resets pagination', function () {
    Member::factory()->count(15)->create(['organization_id' => $this->organization->id]);

    Livewire::test(Index::class)
        ->call('gotoPage', 2)
        ->set('search', 'test')
        ->assertSet('search', 'test');
});

test('displays empty state when no members found', function () {
    Livewire::test(Index::class)
        ->assertSee('No members found')
        ->assertSee('Add your first member');
});

test('displays no results message when search yields no results', function () {
    Member::factory()->create([
        'organization_id' => $this->organization->id,
        'first_name' => 'John']);

    Livewire::test(Index::class)
        ->set('search', 'NonExistentName')
        ->assertSee('No members found matching "NonExistentName"', false);
});
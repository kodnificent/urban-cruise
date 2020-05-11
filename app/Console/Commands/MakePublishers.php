<?php

namespace App\Console\Commands;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Console\Command;

class MakePublishers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:publishers {--with-users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default publisher roles. Default roles are Editor and Author';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Permission::unguard();

        // first we create the editor and author roles and assign permissions to them
        $editor_role = $this->createEditorRole();
        $author_role = $this->createAuthorRole();

        if ($this->option('with-users')) {
            // we'll create 3 editors and 10 authors
            $users = factory(User::class, 3)->create();

            $this->comment('Attaching editor role to 3 new users');

            foreach ($users as $user) {
                $user->roles()->attach($editor_role);
            }

            $users = factory(User::class, 10)->create();

            $this->comment('Attaching author role to 10 new users');

            foreach ($users as $user) {
                $user->roles()->attach($author_role);
            }
        }

        Permission::reguard();
    }

    /**
     * Create a publisher role
     *
     * @return \App\Role
     */
    protected function createRole($title, $description)
    {
        $this->comment("Attempting to create $title role");

        $role = Role::firstWhere('title', $title);

        if ($role) {
            $this->comment("$title role already exists!");
        } else {
            $role = new Role();
            $role->title = $title;
            $role->description = $description;
            $role->save();

            $this->comment("$title role created successfully!");
        }

        return $role;
    }

    /**
     * Creates editor role and saves permission for it
     *
     * @return \App\Role
     */
    protected function createEditorRole()
    {
        $editor = $this->createRole('Editor', 'Editors are content managers.
        They have access to create, read, edit and delete
        posts, post categories and pages');

        $permissions = [
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'news'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'entertainment'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'sports'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'lifestyle'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'categories'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
            Permission::updateOrCreate(['role_id' => $editor->id, 'collection_name' => 'file_manager'], [
                'create' => 'full',
                'read' => 'full',
                'update' => 'full',
                'delete' => 'full'
            ]),
        ];

        $this->comment('Assigning permissions to editor role');

        $this->attachPermissions($editor, $permissions);

        return $editor;
    }

    /**
     * Creates author role and saves permission for it
     *
     * @return \App\Role
     */
    protected function createAuthorRole()
    {
        $author = $this->createRole('Author', 'Authors can only create, read, edit and delete their own posts and nothing more.');

        $permissions = [
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'news'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'entertainment'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'sports'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'lifestyle'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'categories'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
            Permission::updateOrCreate(['role_id' => $author->id, 'collection_name' => 'file_manager'], [
                'create' => 'yes',
                'read' => 'mine',
                'update' => 'mine',
                'delete' => 'mine'
            ]),
        ];

        $this->comment('Assigning permissions to editor role');

        $this->attachPermissions($author, $permissions);

        return $author;
    }

    /**
     * Attaches permissions to a role
     *
     * @param \App\Role $role
     * @param array $permissions
     * @return void
     */
    protected function attachPermissions(Role $role, array $permissions)
    {
        foreach ($permissions as $permission) {
            $role->permissions()->save($permission);
        }
    }
}

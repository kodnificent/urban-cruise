<?php

namespace Tests\Unit;

use App\Traits\HasCreator;
use App\Traits\HasPost;
use App\Traits\HasRole;
use App\Traits\HasUpdater;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\ModelTestCase;
use Tests\Utils\Model\TestsModel;
use Tests\Utils\Model\TestsModelCast;
use Tests\Utils\Model\TestsModelHiddenAttrs;
use Tests\Utils\Model\TestsModelTrait;

class UserTest extends ModelTestCase
{
    use TestsModel, TestsModelTrait, TestsModelCast, TestsModelHiddenAttrs;

    protected function requiredColumns(): array
    {
        return [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'photo',
            'facebook',
            'twitter',
            'instagram',
            'remember_token',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by'
        ];
    }

    protected function requiredTraits(): array
    {
        return [
            HasCreator::class,
            HasUpdater::class,
            HasPost::class,
            HasRole::class,
        ];
    }

    protected function requiredCasts(): array
    {
        return [
            ['email_verified_at', 'datetime'],
            ['created_at', 'datetime'],
            ['updated_at', 'datetime'],
        ];
    }

    public function requiredHiddenAttributes(): array
    {
        return [
            ['password'],
            ['remember_token']
        ];
    }
}

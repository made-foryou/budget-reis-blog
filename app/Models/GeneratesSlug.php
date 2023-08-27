<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
trait GeneratesSlug
{
    public string $slugKey = 'slug';
    public string $valueKey = 'title';

    public function getSlugValue(): string
    {
        return $this->getAttribute(
            key: ($this->isDirty($this->slugKey)) ? $this->slugKey : $this->valueKey
        );
    }

    public function getSlugKey(): string
    {
        return $this->slugKey;
    }

    public function needsASlugGenerated(): bool
    {
        return ( ! $this->exists
            || (
                $this->isDirty($this->valueKey)
                || $this->isDirty($this->slugKey)
            )
        );
    }
}

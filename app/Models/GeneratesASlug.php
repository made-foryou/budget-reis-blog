<?php

namespace App\Models;

interface GeneratesASlug
{
    public function needsASlugGenerated(): bool;

    public function getSlugValue(): string;

    public function getSlugKey(): string;
}

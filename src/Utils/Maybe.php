<?php

declare(strict_types=1);

namespace App\Utils;

/**
 * @template T
 */
class Maybe
{
    /**
     * @var T|null
     */
    private $value;

    /**
     * @param T|null $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param T|null $value
     * @return Maybe<T>
     */
    public static function just($value): Maybe
    {
        return new self($value);
    }

    /**
     * @return Maybe<T>
     */
    public static function nothing(): Maybe
    {
        return new self(null);
    }

    /**
     * @template U
     * @param callable(T):U $fn
     * @return Maybe<U>
     */
    public function map(callable $fn): Maybe
    {
        if ($this->value === null) {
            return self::nothing();
        }
        return self::just($fn($this->value));
    }

    /**
     * @param T $defaultValue
     * @return T
     */
    public function getOrElse($defaultValue)
    {
        return $this->value ?? $defaultValue;
    }
}

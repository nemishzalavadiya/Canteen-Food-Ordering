<?php?>
/*
namespace Doctrine\Instantiator;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Exception;
use ReflectionClass;
use ReflectionException;
use function class_exists;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;
use function strlen;
use function unserialize;

final class Instantiator implements InstantiatorInterface
{
  ic const SERIALIZATION_FORMAT_USE_UNSERIALIZER   = 'C';
    public const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';

 
    private static $cachedInstantiators = [];

    private static $cachedCloneables = [];

 
    public function instantiate($className)
    {
        if (isset(self::$cachedCloneables[$className])) {
            return clone self::$cachedCloneables[$className];
        }

        if (isset(self::$cachedInstantiators[$className])) {
            $factory = self::$cachedInstantiators[$className];

            return $factory();
        }

        return $this->buildAndCacheFromFactory($className);
    }

    private function buildAndCacheFromFactory(string $className)
    {
        $factory  = self::$cachedInstantiators[$className] = $this->buildFactory($className);
        $instance = $factory();

        if ($this->isSafeToClone(new ReflectionClass($instance))) {
            self::$cachedCloneables[$className] = clone $instance;
        }

        return $instance;
    }

    private function buildFactory(string $className) : callable
    {
        $reflectionClass = $this->getReflectionClass($className);

        if ($this->isInstantiableViaReflection($reflectionClass)) {
            return [$reflectionClass, 'newInstanceWithoutConstructor'];
        }

        $serializedString = sprintf(
            '%s:%d:"%s":0:{}',
            self::SERIALIZATION_FORMAT_AVOID_UNSERIALIZER,
            strlen($className),
            $className
        );

        $this->checkIfUnSerializationIsSupported($reflectionClass, $serializedString);

        return static function () use ($serializedString) {
            return unserialize($serializedString);
        };
    }

 
    private function getReflectionClass($className) : ReflectionClass
    {
        if (! class_exists($className)) {
            throw InvalidArgumentException::fromNonExistingClass($className);
        }

        $reflection = new ReflectionClass($className);

        if ($reflection->isAbstract()) {
            throw InvalidArgumentException::fromAbstractClass($reflection);
        }

        return $reflection;
    }

    private function checkIfUnSerializationIsSupported(ReflectionClass $reflectionClass, string $serializedString) : void
    {
        set_error_handler(static function ($code, $message, $file, $line) use ($reflectionClass, & $error) : void {
            $error = UnexpectedValueException::fromUncleanUnSerialization(
                $reflectionClass,
                $message,
                $code,
                $file,
                $line
            );
        });

        try {
            $this->attemptInstantiationViaUnSerialization($reflectionClass, $serializedString);
        } finally {
            restore_error_handler();
        }

        if ($error) {
            throw $error;
        }
    }

    private function attemptInstantiationViaUnSerialization(ReflectionClass $reflectionClass, string $serializedString) : void
    {
        try {
            unserialize($serializedString);
        } catch (Exception $exception) {
            throw UnexpectedValueException::fromSerializationTriggeredException($reflectionClass, $exception);
        }
    }

    private function isInstantiableViaReflection(ReflectionClass $reflectionClass) : bool
    {
        return ! ($this->hasInternalAncestors($reflectionClass) && $reflectionClass->isFinal());
    }

    /**
     * Verifies whether the given class is to be considered internal
     */
    private function hasInternalAncestors(ReflectionClass $reflectionClass) : bool
    {
        do {
            if ($reflectionClass->isInternal()) {
                return true;
            }

            $reflectionClass = $reflectionClass->getParentClass();
        } while ($reflectionClass);

        return false;
    }

    /**
     * Checks if a class is cloneable
     *
     * Classes implementing `__clone` cannot be safely cloned, as that may cause side-effects.
     */
    private function isSafeToClone(ReflectionClass $reflection) : bool
    {
        return $reflection->isCloneable() && ! $reflection->hasMethod('__clone');
    }
}
*/
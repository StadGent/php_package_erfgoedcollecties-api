<?php

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract as ValueAbstractBase;


abstract class ValueAbstract extends ValueAbstractBase implements \JsonSerializable {

  public function jsonSerialize(): mixed {
    $reflection = new \ReflectionObject($this);
    $data = [];
    foreach ($reflection->getProperties() as $property) {
      /** @var \ReflectionProperty $property */
      $data[$this->normalizePropertyNameForJson($property->getName())] = $this->normalizeValueForJson($property->getValue($this));
    }

    return $data;
  }

  protected function normalizePropertyNameForJson($name): string {
      return $name;
  }

  protected function normalizeValueForJson($value): mixed {
    switch (true) {
      case $value instanceof \DateTimeInterface:
        return $value->format('Y-m-d\TH:i:s');
      case $value instanceof \IteratorAggregate:
        return iterator_to_array($value->getIterator());
    }
    return $value;
  }
}

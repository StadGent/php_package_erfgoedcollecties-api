<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * ConceptsResponse value object.
 */
final class ConceptsResponse extends ValueAbstract implements ValueFromArrayInterface
{
    /**
     * The concepts collection.
     *
     * @var \Gent\ErfgoedcollectiesApi\Value\ConceptCollection
     */
    private ConceptCollection $concepts;

    /**
     * The current page.
     *
     * @var int
     */
    private int $page;

    /**
     * The page size.
     *
     * @var int
     */
    private int $pageSize;

    /**
     * The total number of items.
     *
     * @var int
     */
    private int $total;

    /**
     * The next page URL.
     *
     * @var string|null
     */
    private ?string $next;

    /**
     * The previous page URL.
     *
     * @var string|null
     */
    private ?string $previous;

    /**
     * Create the ConceptsResponse from an array of data.
     *
     * @param array $data
     *   The data to extract the values from.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse
     */
    public static function fromArray(array $data): ConceptsResponse
    {
        $response = new self();
        $response->page = (int) ($data['page'] ?? 1);
        $response->pageSize = (int) ($data['pageSize'] ?? 100);
        $response->total = (int) ($data['total'] ?? 0);
        $response->next = $data['next'] ?? null;
        $response->previous = $data['previous'] ?? null;

        $items = !empty($data['items']) && is_array($data['items'])
            ? $data['items']
            : [];
        $response->concepts = ConceptCollection::fromArray($items);

        return $response;
    }

    /**
     * Get the concepts collection.
     *
     * @return \Gent\ErfgoedcollectiesApi\Value\ConceptCollection
     */
    public function getConcepts(): ConceptCollection
    {
        return $this->concepts;
    }

    /**
     * Get the current page.
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Get the page size.
     *
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * Get the total number of items.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Get the next page URL.
     *
     * @return string|null
     */
    public function getNext(): ?string
    {
        return $this->next;
    }

    /**
     * Get the previous page URL.
     *
     * @return string|null
     */
    public function getPrevious(): ?string
    {
        return $this->previous;
    }

    /**
     * Check if there is a next page.
     *
     * @return bool
     */
    public function hasNext(): bool
    {
        return $this->next !== null;
    }

    /**
     * Check if there is a previous page.
     *
     * @return bool
     */
    public function hasPrevious(): bool
    {
        return $this->previous !== null;
    }

    /**
     * Check if the given value object is the same as this.
     *
     * @param \DigipolisGent\Value\ValueInterface|\Gent\ErfgoedcollectiesApi\Value\ConceptsResponse $object
     *
     * @return bool
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \Gent\ErfgoedcollectiesApi\Value\ConceptsResponse $object */
        return $this->sameValueTypeAs($object)
            && $this->getPage() === $object->getPage()
            && $this->getPageSize() === $object->getPageSize()
            && $this->getTotal() === $object->getTotal()
            && $this->getNext() === $object->getNext()
            && $this->getPrevious() === $object->getPrevious()
            && $this->getConcepts()->sameValueAs($object->getConcepts());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf(
            'Page %d of %d (total: %d)',
            $this->getPage(),
            (int) ceil($this->getTotal() / $this->getPageSize()),
            $this->getTotal()
        );
    }
}

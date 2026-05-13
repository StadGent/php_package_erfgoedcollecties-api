<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Artefact;

use DateTimeInterface;
use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to get a paged list of Artefacts.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Artefact
 */
final class GetPagedUri extends BaseUri
{
    /**
     * Construct the URI.
     *
     * @param int $page
     *   The page number (default 1).
     * @param int $pageSize
     *   The page size (default 100).
     * @param DateTimeInterface|null $modifiedSince
     *   Optional filter for modified since date.
     */
    public function __construct(
        int $page = 1,
        int $pageSize = 100,
        ?DateTimeInterface $modifiedSince = null
    ) {
        $params = [
            'page' => $page,
            'pageSize' => $pageSize,
        ];

        if ($modifiedSince !== null) {
            $params['modifiedSince'] = $modifiedSince->format(DateTimeInterface::ATOM);
        }

        $this->uri = sprintf('artefacts?%s', http_build_query($params));
    }
}

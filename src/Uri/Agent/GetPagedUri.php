<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Uri\Agent;

use DateTimeInterface;
use Gent\ErfgoedcollectiesApi\Uri\BaseUri;

/**
 * Uri to get a paged list of Agents.
 *
 * @package Gent\ErfgoedcollectiesApi\Uri\Agent
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

        $this->uri = sprintf('agents?%s', http_build_query($params));
    }
}

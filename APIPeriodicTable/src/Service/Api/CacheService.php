<?php

namespace App\Service\Api;

use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

class CacheService
{
    public function __construct(private readonly TagAwareCacheInterface $cache)
    {
    }

    /**
     * @param string $data // Data in json
     * @param int|null $page // If there is page value in the case of pagination
     * @param int|null $limit // If there is value of the element limit per page in the case of pagination
     * @param string $NameIdCache // For creating a unique key for the cache. This allows specific results from that paging to be identified and retrieved from the cache.
     * @param string $NameItemTag // Is used to tag a cached item with one or more tags. This helps classify cached items, making it easier to manage the cache later.
     * @return mixed
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function CacheRequest(string $data, ?int $page,?int $limit, string $NameIdCache, string $NameItemTag)
    {
        if (!empty($page) and !empty($limit)){
            $idCache = $NameIdCache."-" .$page. "-" . $limit;
        }
        if(empty($page) and empty($limit)){
            $idCache = $NameIdCache.'all';
        }
        return $this->cache->get($idCache,  function (ItemInterface $item) use ($data, $NameItemTag){
            $item->tag($NameItemTag);
            return $data;
        });
    }
}
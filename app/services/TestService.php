<?php
namespace Slim\Services;

class TestService
{

    private $cache;

    public function __construct($cache)
    {
        $this->cache = $cache;

    }

    public function hello()
    {
//        $ttl = config('cache.' . get_class() . '.ttl');
//        echo config('cache.' . get_class() . '.ttl');
        $ttl = 10;
        $cacheKey = "test";

        if ($this->cache->get($cacheKey)) {
//            $data = $this->cache->get($cacheKey);
            $data = "cache";
        }else{
            $data="no cache";
            $this->cache->add($cacheKey, $data,200,['test' => 'test'],$ttl);
        }
        return $data;
    }
}
<?php

namespace ActiveRecord;

interface CacheInterface {
    public function flush();
    public function read($key);
    public function write($key, $value, $expire);
    public function delete($key);
}
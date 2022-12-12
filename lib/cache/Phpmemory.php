<?php
namespace ActiveRecord;

class Phpmemory implements ActiveRecordCacheInterface {
    private static $cache = [];

    public function flush() {
        self::$cache = [];
    }

    public function read($key) {
        return isset(self::$cache[$key]) && self::$cache[$key]['expire'] > time()
            ? self::$cache[$key]['value']
            : null;
    }

    public function write($key, $value, $expire) {
        self::$cache[$key] = [
            'value' => $value,
            'expire' => time() + $expire
        ];
    }

    public function delete($key) {
        unset(self::$cache[$key]);
    }
}
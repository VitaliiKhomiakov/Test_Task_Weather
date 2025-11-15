<?php

declare(strict_types=1);

namespace Infrastructure\Common;

class Request {
    public function __construct(
        public GetParameters $get,
        public PostParameters $post
    ) {
    }
}

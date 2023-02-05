<?php
declare(strict_types=1);

namespace Infrastructure\Common;

class Request
{
    public GetParameters $get;
    public PostParameters $post;

    public function __construct(GetParameters $getParameters, PostParameters $postParameters)
    {
        $this->post = $postParameters;
        $this->get = $getParameters;
    }
}
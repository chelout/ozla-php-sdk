<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\Comment;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesComments
{
    public function comments(int $dealId): ApiResourceCollection
    {
        $response = $this->get("deals/{$dealId}/comments");

        return new ApiResourceCollection($response, Comment::class);
    }

    public function createComment(int $dealId, array $data): Comment
    {
        $response = $this->post("deals/{$dealId}/comments", $data);

        return new Comment($response);
    }

    public function comment(int $dealId, int $commentId): Comment
    {
        $response = $this->get("deals/{$dealId}/comments/{$commentId}");

        return new Comment($response);
    }

    public function updateComment(int $dealId, int $commentId, array $data): Comment
    {
        $response = $this->put("deals/{$dealId}/comments/{$commentId}", $data);

        return new Comment($response);
    }

    public function deleteComment(int $dealId, int $commentId)
    {
        $this->delete("deals/{$dealId}/comments/{$commentId}");
    }
}

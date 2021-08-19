<?php

namespace App\Traits;

trait ApiResponser
{
    protected function successResponse($data, $message = null, $code = 200)
	{
		return response()->json([
			'status' => 'Success',
			'message' => $message,
			'data' => $data
		], $code);
	}

	protected function errorResponse($message = null, $code)
	{
		return response()->json([
			'status' => 'Error',
			'message' => $message
		], $code);
	}

    protected function withoutBodyResponse($code)
	{
		return response()->json(null, $code);
	}
}

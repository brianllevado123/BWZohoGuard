<?php

namespace brianllevado123\BWZohoGuard\Http\Controllers;

use brianllevado123\BWZohoGuard\Http\Requests\APIRequest;
use Illuminate\Routing\Controller;
use mysql_xdevapi\Exception;

class APIController extends Controller
{
    protected $masterPassword;

    protected $bitwardenUrl;

    public function __construct()
    {
        $this->masterPassword = config('bitwarden.master_password');
        $this->bitwardenUrl = config('bitwarden.bitwarden_url');
    }

    public function handleBWApiRequest(APIRequest $request)
    {
        $data = $request->input();

        try {
            $this->unlockVault();

            $response = APIClient($this->bitwardenUrl.$data['bw_api_endpoint'], $data['bw_request_method'], $data['bw_request_payload']);

            if ($response == 'Not Found') {
                return response()->json(['message' => 'Endpoint not found!']);
            }

            $this->lockVault();

            return response()->json([$response->json()]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    protected function unlockVault()
    {
        return APIClient($this->bitwardenUrl.'/unlock', 'post', ['password' => $this->masterPassword]);
    }

    protected function lockVault()
    {
        return APIClient($this->bitwardenUrl.'/lock', 'post', ['password' => $this->masterPassword]);
    }
}

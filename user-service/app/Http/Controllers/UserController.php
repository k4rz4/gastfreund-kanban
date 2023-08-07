<?php 
namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return UserResource::collection(
            $this->userService->getAllUsers()
        );
    }

    public function store(Request $request)
    {
        $user = $this->userService->createUser($request->validated());
        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return new UserResource(
            $this->userService->getUser($user)
        );
    }

    public function update(Request $request, User $user)
    {
        return new UserResource(
            $this->userService->updateUser($user, $request->validated())
        );
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return response()->json(null, 204);
    }
}

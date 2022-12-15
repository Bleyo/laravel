<?

namespace App\src\User\Services;

use Illuminate\Hashing\HashManager;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Auth\AuthManager;
use App\src\User\Traits\RequestsUser;
use App\src\User\Traits\ManagesUser;
use App\src\User\Traits\CreatesUser;
use App\src\Services\HttpClient;
use App\Models\User;

class UserProvider extends EloquentUserProvider
{
    use RequestsUser, CreatesUser, ManagesUser;

    private $httpClient;


    private $authManager;


    private $hashManager;


    public function __construct(
        HttpClient $client,
        AuthManager $authManager,
        HashManager $hashManager,
    ) {

        $this->httpClient = $client;
        $this->authManager = $authManager;
        $this->hashManager = $hashManager;

        $hash = $hashManager->createBcryptDriver();
        $user = new User($this->getGenericUser());
        parent::__construct($hash, $user);

        $this->finalize();
    }
}

<?

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

interface Authenticated extends Authenticatable, UserProvider
{
    /**
     * @method getAuthIdentifierName();
     *
     * @method getAuthIdentifier();
     *
     * @method getAuthPassword();
     *
     * @method getRememberToken();
     *
     * @method setRememberToken($value);
     *
     * @method getRememberTokenName();
     *
     * @method retrieveById($uid);
     *
     * @method retrieveByToken($uid, $token);
     *
     * @method updateRememberToken(Authenticatable $user, $token);
     *
     * @method retrieveByCredentials(array $credentials);
     *
     * @method validateCredentials(Authenticatable $user, array $credentials);
     */
}

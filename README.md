# Пример использования Router

Этот проект демонстрирует пример использования маршрутизации в php с использованием psr.

## Пример использования

Для использования данного примера, у вас должен быть установлен PHP и Composer.

Пример использования:

```php
use App\router\App;
use App\router\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$app = App::create();

$app->getRouter()->get('/', function (RequestInterface $request, ResponseInterface $response) {
    return JsonResponse::create($response, ['success' => true]);
});

$app->run();

# Yii2 API with Google App Engine
Create RESTFul for deploy on Google App Engine <b>(Standard Environment)</b> with Yii2

### Support
1. response both xml and json format
2. make versioning
3. using .env file between server and local
4. using memcache via  app-engine

### Installation
```bash
git clone https://github.com/prawee/yii2-gae-api
cd yii2-gae-api
composer install
```

### Configuration
Update environment variable for your local
```bash
cp .env.dist .env
```

Update environment variable for your GAE
```bash
cp app.yaml.dist app.yaml
cp cron.yaml.dist cron.yaml
```
Update configure on your local
```bash
cp config/main-local.php.dist config/main-local.php
```

### Running
localhost
```bash
php -S localhost:8080 -t public
```

localhost with google app engine
```bash
dev_appserver.py app.yaml
```

### Look
```bash
# local
GET localhost:8080/requirements.php
GET localhost:8080/site
GET localhost:8080/v1/users
```

```bash
# gae
GET https://<project-id>.appspot.com/requirements.php
GET https://<project-id>.appspot.com/site
GET https://<project-id>.appspot.com/v1/users
```
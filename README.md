# yii2-gae-api
Create RESTful for deploy on Google App Engine with Yii2

### Support
1. JSON
2. Version
3. .env

### Installalion
```bash
$ git clone https://github.com/prawee/yii2-gae-api
$ cd yii2-gae-api
$ composer install
```

### Running
localhost
```bash
$ php -S localhost:8080 -t web
```

localhost with google app engine
```bash
$ dev_appserver.py app.yaml
```

### Look
```bash
# local
GET localhost:8080/site
GET localhost:8080/v1/users
```

```bash
# gae
GET https://<project-id>.appspot.com/site
GET https://<project-id>.appspot.com/v1/users
```
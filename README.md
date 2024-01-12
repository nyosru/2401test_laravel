# 2401test_laravel

Тестовое задание для middle php
Разработать API backend на фреймворке Laravel 8 (если вас собеседовали на другой стек, то вероятно вам скинули не то тестовое задание). В качестве БД использовать MySQL, Postgresql. Ожидаемое время выполнения 4 часа. Результат должен быть выложен на github

Требуемый функционал:
Регистрация: ФИО, email (уникальный), телефон (уникальный), пароль, подтверждение пароля. Все поля обязательны. Пароль должен быть не менее 6 символов, только латиница, минимум 1 символ верхнего регистра, минимум 1 символ нижнего регистра, минимум 1 спец символ $%&!:. Телефон должен удовлетворять маске: начинаться с +7 после чего идет 10 цифр.
Авторизация: email или телефон (одно поле), пароль

Для атворизованных пользователей доступен “каталог товаров”. 
Товар: название, цена, количество. 
Свойства (опции) товара: название
Свойства товара должны быть произвольными т.е. заполняться в БД
Реализовать фильтрацию списка товаров с множественным выбором, например GET /products?properties[свойство1][]=значение1_своства1&properties[свойство1][]=значение2_своства1&properties[свойство2][]=значение1_свойства2.

Методы доступные неавторизованным пользователям: регистрация, авторизация

Методы доступные авторизованным пользователям: список товаров (“каталог товаров”) пагинированных по 40

Идентификация пользователя должна происходить по Bearer токену.


!Уточнение - пояснение!

Необходимо  сделать фильтр товаров по опциям товаров, например, есть товары "настольный светильник", с опциями цвет плафона, цвет арматруы, бренд. Нужно по опциям отфильтровать товары.
Также пример любой интернет магазин https://svetilniki.shop/catalog/lustri
 
# что делал 

+ поставил ларавель 8
+ настроил локальную среду для разработки (докер)
+ установил свагер
+ создана регистрация и вход пользователя
+ проверку регистрации пользователя в свагер, валидация полей
+ добавил хитрый способ авторизации по логину (почта или телефон) и паролю
+ исключение проверки csrf при регистрации и логине пользователя
+ установил паспорт для работы с беарер токеном
+ Интегрировал Passport для работы с Bearer токенами.
+ создал модели для товаров и свойств
+ создал сидеры и фабрики, база заполнена данными в названия товаров добавлен product и в опции prop ... чтобы не запутаться что куда относится так как названия наугад
+ запустил общее получение продуктов с использованием ресурсных коллекций
+ добавил пагинацию и выбор номера страницы в свагере
+ создал макефайл чтобы не забыть стартовую команду для норм работы создания токенов в дальнейшем
+ настроил норм запрос для выборки продуктов по фильтрам много элементным
+ добавил технические форматы вывода чтобы по быстрому смотреть запрос и какие данные возвращает фильтр, отдельное поле в свагере
+ добавил входную страничку, опубликовал на сервере https://test2401laravel-vitrin.php-cat.com
+ установил автодеплой при пуше в гит (github/action) чтобы демо площадка сама обновлялась если что поменяю  в гите
+ и оповещение в телегу как проходит обновления

# HR прислала результат кодревью, не прошёл (

Тимлид проверил тестовое и не готов пригласить вас в компанию. Привожу его комментарий по выполнению:

+ Положительное:
  + Хорошо, что использовал relations, 
  + использовал ресурсы, 
  + умеет пробрасывать переменные в контекст функции переменные, 
  + подключена документация, 
  + подключен автодеплой, 
  + необычное оформление демо-страницы. 
+ Из недоработок:
  + Структура в базе реализована неверно, 
  + задача выполнена неправильно, 
  + функционал в контроллере, 
  + форм реквесты не использовал, 
  + стили не выдержаны, 
  + не видно использование сервис контейнера и тд.


# доделки варианта в соответствии с тем что написали выше 

1. сервисный слой

    вынес логику в сервисный слой ( файлы в папке service, контроллер стал тонким )

2. реквест

    + по поводу подключения проверки входящих данных с помощью реквеста ... 
    + считаю эту штуку не нужной и избыточной .. так как обрабатывается чёткая структура массива и значения параметров могут быть любыми  
    + (от иньекций код защищён так как использую ОРМ а не сырой sql запрос)

3. какой формат базы данных вы считаете верным ? чтобы хранить товары их возможные свойства и их значения
, сейчас это:
      + таблица товаров 
      + таблица с возможными свойствами 
      + связь многие ко многим и в этой pivot таблице содержится значение свойства если оно есть в продукте
    
4. что такое "стили не выдержаны," ?

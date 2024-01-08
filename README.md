# 2401test_laravel

Тестовое задание для middle php
Разработать API backend на фреймворке Laravel 8 (если вас собеседовали на другой стек, то вероятно вам скинули не то тестовое задание). В качестве БД использовать MySQL, Postgresql. Ожидаемое время выполнения 4 часа. Результат должен быть выложен на github

Требуемый функционал:
Регистрация: ФИО, email (уникальный), телефон (уникальный), пароль, подтверждение пароля. Все поля обязательны. Пароль должен быть не менее 6 символов, только латиница, минимум 1 символ верхнего регистра, минимум 1 символ нижнего регистра, минимум 1 спец символ $%&!:. Телефон должен удовлетворять маске: начинаться с +7 после чего идет 10 цифр.
Авторизация: email или телефон (одно поле), пароль
Для атворизованных пользователей доступен “каталог товаров”. Товар: название, цена, количество. Свойства (опции) товара: название
Свойства товара должны быть произвольными т е заполняться в БД
Реализовать фильтрацию списка товаров с множественным выбором, например GET /products?properties[свойство1][]=значение1_своства1&properties[свойство1][]=значение2_своства1&properties[свойство2][]=значение1_свойства2.

Методы доступные неавторизованным пользователям: регистрация, авторизация

Методы доступные авторизованным пользователям: список товаров (“каталог товаров”) пагинированных по 40

Идентификация пользователя должна происходить по Bearer токену.


!Уточнение - пояснение!

Необходимо  сделать фильтр товаров по опциям товаров, например, есть товары "настольный светильник", с опциями цвет плафона, цвет арматруы, бренд. Нужно по опциям отфильтровать товары.
Также пример любой интернет магазин https://svetilniki.shop/catalog/lustri
 
# что делал 

+ поставил аравель 8
+ добавил свагер

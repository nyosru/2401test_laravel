start-fresh:
	php artisan migrate:fresh --seed
	# команда для норм создания токенов в паспорте
	php artisan passport:client --personal

# обновление свагера
swager:
	php artisan l5-swagger:generate

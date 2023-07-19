php_8_name := ea-php80
php_default := php

cou8:
	$(php_8_name) /opt/cpanel/composer/bin/composer update
coi8:
	$(php_8_name) /opt/cpanel/composer/bin/composer install
pasl8:
	$(php_8_name) artisan storage:lik
pam8:
	$(php_8_name) artisan migrate
pamr8:
	$(php_8_name) artisan migrate:rollback
paoc8:
	$(php_8_name) artisan optimize:clear
ds8:
	$(php_8_name) artisan db:seed
dsc8:
	$(php_8_name) artisan db:seed --class=$(c)
tp8:
	$(php_8_name) artisan telescope:prune --hours=0
cou:
	composer update
coi:
	composer install
pasl:
	$(php_default) artisan storage:lik
pam:
	$(php_default) artisan migrate
pamr:
	$(php_default) artisan migrate:rollback
paoc:
	$(php_default) artisan optimize:clear
gcr:
	git config credential.helper store
glg1:
	git log --graph --abbrev-commit --decorate --format=format:"%C(bold blue)%h%C(reset) - %C(bold green)(%ar)%C(reset) %C(white)%s%C(reset) %C(dim white)- %an%C(reset)%C(auto)%d%C(reset)"
glg2:
	git log --graph --abbrev-commit --decorate --format=format:"%C(bold blue)%h%C(reset) - %C(bold cyan)%aD%C(reset) %C(bold green)(%ar)%C(reset)%C(auto)%d%C(reset)%n%C(white)%s%C(reset) %C(dim white)- %an%C(reset)"
glg3:
	git log --graph --abbrev-commit --decorate --format=format:"%C(bold blue)%h%C(reset) - %C(bold cyan)%aD%C(reset) %C(bold green)(%ar)%C(reset) %C(bold cyan)(committed\: %cD)%C(reset) %C(auto)%d%C(reset)%n          %C(white)%s%C(reset)%n          %C(dim white)- %an <%ae> %C(reset) %C(dim white)(committer\: %cn <%ce>)%C(reset)"
mp:
	$(php_default) artisan make:policy $(n)
mmc:
	$(php_default) artisan make:migration create_$(n) --create
mma:
	$(php_default) artisan make:migration alter_table_$(n)_$(c) --table=$n
ds:
	$(php_default) artisan db:seed
dsc:
	$(php_default) artisan db:seed --class=$(c)
tp:
	$(php_default) artisan telescope:prune --hours=0


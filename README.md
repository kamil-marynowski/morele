## Wymagania
- php 8.2
- composer 2.6.*

## Instalacja

- composer install

## Uruchamianie algorytmów
{HOST}/public/index.php?route=get_recommendations&algorithm={algorithmName}

### Nazwy algorytmów
1. Zwracane są 3 losowe tytuły.
    - Nazwa: ThreeRandomTitles
    - Przykładowy URL: http://localhost/morele/public/index.php?route=get_recommendations&algorithm=ThreeRandomTitles 


2. Zwracane są wszystkie filmy na literę ‘W’ ale tylko jeśli mają parzystą liczbę znaków w tytule
    - Nazwa: MoviesBeginWithWAndHaveEvenNumberOfCharacters
    - Przykładowy URL: http://localhost/morele/public/index.php?route=get_recommendations&algorithm=MoviesBeginWithWAndHaveEvenNumberOfCharacters


4. Zwracany są wszystkie tytuły, które składają się z więcej niż 1 słowa.
    - Nazwa: MoreThanOneWord
    - Przykładowy URL: http://localhost/morele/public/index.php?route=get_recommendations&algorithm=MoreThanOneWord

## Uruchamianie testów

   - przejdź do folderu z projektem
   - uruchom komendę: ``` ./vendor/bin/phpunit tests```
 

/* Тестовые данные */
INSERT INTO `mydb`.`user` (`id`, `name`, `email`, `hash`) 
    VALUES  (NULL, 'Шкатов Д. М.', 'shkatov.dmitry@gmail.com', NULL),
            (NULL, 'Иванов И. И.', 'ivanov@gmail.com', NULL),
            (NULL, 'Петров С. А.', 'petrov@gmail.com', NULL),
            (NULL, 'Сидоров В. Ю.', 'sidorov@gmail.com', NULL),
            (NULL, 'Николаев А. А.', 'nikolaev@gmail.com', NULL);


SELECT id, name, email 
  FROM `user`;

SELECT DISTINCT name, email 
  FROM `user`;

SELECT name, email 
  FROM `user`
  WHERE id = '2';

DELETE FROM `user`
  WHERE email LIKE 'shkatov%' AND id IN (2,7);

UPDATE user 
SET name = 'Иванченко И.С.', email = 'ivanchenco@gmail.com'
WHERE id = 8;


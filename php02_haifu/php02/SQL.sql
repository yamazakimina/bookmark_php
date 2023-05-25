INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES('テスト2','test02@test','ないよう2',30,sysdate());
INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES('テスト3','test03@test','ないよう3',40,sysdate());
INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES('テスト4','test04@test','ないよう4',50,sysdate());
INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES('テスト5','test05@test','ないよう5',60,sysdate());
INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES('テスト6','test06@test','ないよう6',70,sysdate());

SELECT * FROM gs_an_table;
SELECT id,name FROM gs_an_table;
SELECT * FROM gs_an_table WHERE id=3;
SELECT * FROM gs_an_table WHERE email LIKE '%1@%';
SELECT * FROM gs_an_table ORDER BY id DESC;
SELECT * FROM gs_an_table ORDER BY id DESC LIMIT 3;

-- 本番用
INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES(:name,:email,:naiyou,:age,sysdate());

UPDATE `languages` SET `english` = 'Invalid username OR password.' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `bengali` = 'ভুল  ব্যবহারকারীর নাম বা পাসওয়ার্ড' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `spanish` = 'Usuario o contraseña invalido' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `arabic` = 'خطأ في اسم المستخدم أو كلمة مرور' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `hindi` = 'अमान्य उपयोगकर्ता नाम या पासवर्ड।' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `urdu` = 'غلط صارف نام یا پاس ورڈ' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `chinese` = '用户名或密码无效' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `japanese` = 'ユーザー名かパスワードが無効' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `portuguese` = 'Nome de usuário ou senha inválidos' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `russian` = 'Неправильное имя пользователя или пароль' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `french` = 'Nom dutilisateur OU mot de passe invalide' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `korean` = '잘못된 사용자 이름 또는 비밀번호입니다' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `german` = 'Ungültiger Benutzername oder Passwort' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `italian` = 'Nome utente o password errati' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `thai` = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `hungarian` = 'Érvénytelen felhasználónév vagy jelszó' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `dutch` = 'Ongeldige gebruikersnaam of wachtwoord' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `latin` = 'Nullam Username: Password' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `indonesian` = 'Username dan password salah' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `turkish` = 'Geçersiz kullanıcı adı veya şifre' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `greek` = 'Μη έγκυρο όνομα ή κωδικός' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `persian` = 'نام کاربری یا کلمه عبور نامعتبر است' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `malay` = 'Nama pengguna atau kata laluan tidak sah' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `telugu` = 'తప్పుడు వాడుకరిపేరు లేదా సంకేతపదం' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `tamil` = 'தவறான பயனர் பெயர் அல்லது கடவுச்சொல்' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `gujarati` = 'અમાન્ય વપરાશકર્તાનામ અથવા પાસવર્ડ' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `polish` = 'Nieprawidłowa nazwa użytkownika lub hasło' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `ukrainian` = 'Неправильне ім я користувача або пароль.' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `panjabi` = 'ਅਵੈਧ ਉਪਯੋਗਕਰਤਾ ਨਾਂ ਜਾਂ ਪਾਸਵਰਡ' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `romanian` = 'Nume de utilizator sau parola incorecte.' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `burmese` = 'မှားနေသောအသုံးပြုသူအမည် OR password ကို။' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `yoruba` = 'Orukọ olumulo ailewu TABI ọrọigbaniwọle' WHERE `languages`.`id` = 406;
UPDATE `languages` SET `hausa` = 'Sunan mai amfani mara amfani KO kalmar sirri.' WHERE `languages`.`id` = 406;


INSERT INTO `languages` (`id`, `label`, `english`, `bengali`, `spanish`, `arabic`, `hindi`, `urdu`, `chinese`, `japanese`, `portuguese`, `russian`, `french`, `korean`, `german`, `italian`, `thai`, `hungarian`, `dutch`, `latin`, `indonesian`, `turkish`, `greek`, `persian`, `malay`, `telugu`, `tamil`, `gujarati`, `polish`, `ukrainian`, `panjabi`, `romanian`, `burmese`, `yoruba`, `hausa`) 
VALUES (854, 'industry_type', 'Industry Type', 'ইন্ডাস্ট্রি টাইপ', 'Tipo de industria', 'نوع الصناعة', 'उद्योग के प्रकार', 'صنعت کی قسم', '行业类型', '業種別', 'tipo industrial', 'Тип промышленности', 'type dindustrie', '업종', 'Branchentyp', 'Tipo dindustria', 'ประเภทอุตสาหกรรม', 'Ipari típus', 'industrie type', 'Type Industry', 'Jenis Industri', 'Endüstri Tipi', 'Τύπος βιομηχανίας', 'نوع صنعت', 'Jenis Industri', 'పరిశ్రమ పద్ధతి', 'தொழில் வகை', 'ઉદ્યોગ પ્રકાર', 'typ przemysłu', 'Тип промисловості', 'ਉਦਯੋਗ ਕਿਸਮ', 'tipul industriei', 'စက်မှုအမျိုးအစား', 'Iru iṣẹ Iru', 'Masanaantu');

ALTER TABLE `payment_settings` ADD `paytm_industry_type` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `paytm_merchant_website`;

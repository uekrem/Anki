# Anki Ezber Yardım Sitesi (PHP/MySQL)

Bu, PHP ve MySQL tabanlı bir ezber yardım sitesidir. Kullanıcılar, e-posta ve şifreleri ile kayıt olabilir, hafıza kartı desteleri kartları oluşturabilir, hafıza oyunu oynayabilir ve çıkış yapabilirler.

### Kullanım:

1. **Kayıt Ol veya Giriş Yap:**
   - Uygulamayı kullanmak için öncelikle bir hesap oluşturun veya mevcut bir hesapla giriş yapın.

2. **Hafıza Kartı Destesi Kartlarınızı Oluşturun ve Yönetin:**
   - Hesabınıza giriş yaptıktan sonra, kendi hafıza kartı destenizi oluşturabilir ve destenize kart ekleyebilirsiniz.

![cards](https://github.com/uekrem/Anki/assets/110349452/77ffed6c-bae7-4804-bbce-dd68bcc2046a)

3. **Oyuna Başla:**
   - Oyuna başlamak için "Start Game" tuşuna basın. Oluşturulan kartlarla oyun, kartların arkası oyuncuya dönük bir şekilde başlar. Eğer bir kartın arkası çevrilirse, o kart bilinemez ve yine oyuncunun karşısına çıkarılır.
   - Oyuncu, kartların arkasına bakabilir veya "Skip" tuşuna basarak bir kartı atlayabilir. Atlanan kartlar oyuncu tarafından bilindiği varsayılıp desteden çıkarılır.

![gameStart](https://github.com/uekrem/Anki/assets/110349452/373ab506-8067-437b-ae6e-f12f776f5a71)

4. **Turn Back Özelliği:**
   - Ekstra bir özellik olarak, "Turn Back" tuşuna basılırsa oyuncu kart yönetme arayüzüne gelir. Bu arayüze geldiğinde oyuncunun ilerlemesi sıfırlanmaz. Oyuncu bu ekrandayken kart ekleme yaptığında en son oynanan desteye eklenir, orijinal deste korunmuş olur. Bu arayüzden tekrar "Turn Back" tuşuna basılırsa ilerleme sıfırlanır. Diğer türlü, tüm kartlar bilinene kadar oyun devam eder.

5. **Çıkış Yap:**
   - Kullanıcı siteden istediğinde çıkış yapabilir.

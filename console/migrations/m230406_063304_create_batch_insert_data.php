<?php

use yii\db\Migration;

/**
 * Class m230406_063304_create_batch_insert_data
 */
class m230406_063304_create_batch_insert_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%category}}', ['slug', 'name_uz', 'name_ru'], [
            ['dars_ishlanmalar', 'Dars ishlanmalar', 'Образовательные программы'],
            ['diplom_ishlar', 'Diplom ishlar', 'Дипломные работы'],
            ['darsliklar', "Slaydlar (maktab darsliklari bo'yicha)", 'Учебники (по школьные предметы)'],
            ['slaydlar', 'Slaydlar', 'Презентации'],
            ['referatlar', 'Referatlar', 'Рефераты'],
            ['kurs_ishlari', 'Kurs ishlari', 'Курсовые работы'],
        ]);
        $this->batchInsert(
            '{{%subjects}}',
            ['slug', 'name_uz', 'name_ru'],
            [
                ['adabiyot', "Adabiyot", 'Литература'],
                ['algebra', "Algebra", 'Алгебра'],
                ['anatomiyda', "Anatomiya", 'Анатомия'],
                ['arxitektura', "Arxitektura", 'Архтектура'],
                ['astronomiya', "Astronomiya", 'Астрономия'],
                ['biologiya', "Biologiya", 'Биология'],
                ['biotexnologiya', "Biotexnologiya", 'Биотехнология'],
                ['botanika', "Botanika", 'Ботаника'],
                ['chizmachilik', 'Chizmachilik', 'Черчение'],
                ['chqbt', "CHQBT", 'НВП'],
                ['dinshunoslik_asoslari', "Dinshunoslik asoslari", 'Основы религиоведения'],
                ['ekologiya', 'Ekologiya', 'Экология'],
                ['energetika', 'Energetika', 'Энергетика'],
                ['falsafa', 'Falsafa', 'Философия'],
                ['fizika', "Fizika", 'Физика'],
                ['fransuz_tili', "Fransuz tili", 'Французский язык'],
                ['geodeziya', "Geodeziya", 'Геодезия'],
                ['geografiya', "Geografiya", 'География'],
                ['geologiya', 'Geologiya', 'Геология'],
                ['geometriya', "Geometriya", 'Геометрия'],
                ['huquqshunoslik', "Huquqshunoslik", 'Юриспруденция'],
                ['informatika_va_at', "Informatika va AT", 'Информатика и ИТ'],
                ['ingliz_tili', "Ingliz tili", 'Английский язык'],
                ['iqtisodiyot', "Iqtisodiyot", 'Экономика'],
                ['issiqlik_texnikasi', "Issiqlik texnikasi", 'Тепловая инженерия'],
                ['jismoniy_tarbiya', "Jismoniy tarbiya", 'Физическая культура'],
                ['kimyo', "Kimyo", 'Химия'],
                ['konchilik_ishi', "Konchilik ishi", 'Горное дело'],
                ['madaniyatshunoslik', "Madaniyatshunoslik", 'Культурология'],
                ['maktabgacha_boshlangich', "Maktabgacha va boshlang'ich ta'lim", 'Дошкольное и начальное образование'],
                ['manaviyat_asoslari', "Manaviyat asoslari", 'Основы культурологии'],
                ['mashinasozlik', "Mashinasozlik", 'Машиностроение'],
                ['materialshunoslik', "Materialshunoslik", 'Материаловедение'],
                ['mehnat', "Mehnat", 'Труд'],
                ['metrologiya', "Metrologiya", 'Метрология'],
                ['mexanika', "Mexanika", 'Механика'],
                ['milliy_istiqlol_goyasi', "Milliy istiqlol g'oyasi", 'Идея национальной независимости'],
                ['musiqa', "Musiqa", 'Музыка'],
                ['nemis_tili', "Nemis tili", 'Немецкий язык'],
                ['oqish', "O'qish", 'Чтение'],
                ['odam_va_uning_salomatligi', "Odam va uning salomatligi", 'Человек и его здоровье'],
                ['odobnoma', "Odobnoma", 'Этика'],
                ['oziq_ovqat_texnologiyasi', "Oziq_ovqat texnologiyasi", 'Пищевая технология'],
                ['pedagogika', "Pedagogika", 'Педагогика'],
                ['prezident_asalari', "Prezident asarliar", 'Президентские произведения'],
                ['psixologiya', "Psixologiya", 'Психология'],
                ['qishloq_va_ormon_xujaligi', "Qishloq va o'rmon xo'jaligi", 'Психология'],
                ['radiotexnika', "Radiotexnika", 'Сельское и лесное хозяйство'],
                ['rus_tili_va_adabiyoti', "Rus tili va adabiyoti", 'Русский язык и литератур'],
                ['sanat', "San'at", 'Искусство'],
                ['siyosatshunoslik', "Siyosatshunoslik", 'Политология'],
                ['sotsiologiya', "Sotsiologiya", 'Социология'],
                ['suv_xujaligi', "Suv xo'jaligi", 'Водное хозяйство'],
                ['tabiatshunoslik', "Tabiatshunoslik", 'Естествознание'],
                ['tarix', "Tarix", 'История'],
                ['tasviriy_sanat', "Tasviriy_san'at", 'Изобразительное искусство'],
                ['texnika_va_texnologiya', "Texnika va texnologiya", 'Техника и технология'],
                ['tibbiyot', "Tibbiyot", 'Медицина'],
                ['tilshunoslik', "Tilshunoslik", 'Лингвистика'],
                ['to_qimachilik', "To'qimachilik", 'Текстиль'],
                ['transport', "Transport", 'Транспорт'],
                ['valeologiya', "Valeologiya", 'Валеология'],
                ['hayot_faoliyati', "Hayot faoliyati havfsizligi", 'БЖД'],
                ['zoologiya', "Zoologiya", 'Зоология']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230406_063304_create_batch_insert_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230406_063304_create_batch_insert_data cannot be reverted.\n";

        return false;
    }
    */
}

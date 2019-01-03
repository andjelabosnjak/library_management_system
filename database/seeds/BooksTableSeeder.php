<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Book 1   
        Book::create([
            'title' => 'On the origin of species',
            'author' => 'Charles Darwin',
            'description' => 'On the Origin of Species is the famous book by Charles Darwin. It gave evidence on evolution, and suggested what had caused evolution to happen.[1]
                            Its full title was On the origin of species by means of natural selection, or the preservation of favoured races in the struggle for life.
                            It was published in London by John Murray in November 1859. It was translated into many languages, and has been in print ever since. The title since the 6th edition of 1872 has been The Origin of Species. This is the most important single book in the biological sciences, and its main ideas are well-supported by modern research.',
            'category_id' => 8,
            'number_of_pages' => 502,
            'number_of_copies' => rand(0,20),
            'cover_image' => 'on_the_origin_of_species.jpg',
            'file_pdf' => '1861_OriginNY_F382.pdf'
        ]);

        //Book 2
        Book::create([
        'title' => 'The interpretation of Dreams',
        'author' => 'Sigmund Freud',
        'description' => 'In standard scholarly style, Freud begins The Interpretation of Dreams by surveying all of the major scientific, philosophical, and pop cultural theories of dreaming that came before his own. His goal in the first chapter of the book is to survey whats already been said about dreaming so that readers are well-prepared for his own thoughts on the subject.
                        After laying his critical groundwork, Freud jumps right into a specimen dream—his Dream of Irmas Injection. Freuds detailed interpretation of the dream is a hands-on demonstration of his unique methodology, and he concludes his analysis by arguing that his Dream of Irmas Injection fulfilled an unconscious wish. In fact, Freud doesn t stop there: he goes on to argue that every dream is "the fulfilment of a wish"',
        'category_id' => 8,
        'number_of_pages' => 430,
        'number_of_copies' => rand(0,20),
        'cover_image' => 'the_interpretation_of_dreams.jpg'
        ]);

        //Book 3
        Book::create([
        'title' => 'The Diary of a young girl',
        'author' => 'Anne Frank',
        'description' => 'The book begins on Anne s thirteenth birthday, June 12, 1942. She receives as a present from her parents a diary, among other presents. She thinks about it for several days and decides to write letters as her diary entries,
                            she addresses each letter to Kitty. Kitty is a fabricated friend, someone in which Anne can expose her deepest feelings to.
                            Annes family has emigrated to Holland from Germany for two reasons, the first is Mr. Frank has taken a job there and the second is to move away from the Nazi Party. The Nazis are making life very restrictive for the Jewish people in Germany.
                            Even though they have left Germany, the Jewish restrictions of the Nazi Party still exist in Holland. They all are required to wear a yellow star on their clothing, attend only Jewish schools, shop at Jewish stores and other restrictions also apply. The full impact of the restrictions and horrors of the Nazi Party are felt by the family on the day Annes sister, Margot, is called up. This means that she is to be taken away, in all probability to a concentration camp. The family knew they would one day have to go into hiding and had been making preparations for the move, this just moved up the time table of when they would go.',                              
        'category_id' => 4,
        'number_of_pages' => 500,
        'number_of_copies' => rand(0,20),
        'cover_image' => 'anne_frank.jpg',
        'file_pdf' => 'Anne-Frank-The-Diary-Of-A-Young-Girl.pdf'
        ]);
    
        //Book 4
        Book::create([
        'title' => '1776',
        'author' => 'David McCullough',
        'description' => 'In this masterful book, David McCullough tells the intensely human story of those who marched with General George Washington in the year of the Declaration of Independence - when the whole American cause was riding on their success, without which all hope for independence would have been dashed and the noble ideals of the Declaration would have amounted to little more than words on paper.',
        'category_id' => 6,
        'number_of_pages' => 432,
        'number_of_copies' => rand(0,20),
        'cover_image' => '1776.jpg'
        ]);

        //Book 5 
        Book::create([
        'title' => 'A Brief History Of Time : From Big Bang To Black Holes',
        'author' => 'Stephen Hawking',
        'description' => 'Was there a beginning of time? Could time run backwards? Is the universe infinite or does it have boundaries?
                         These are just some of the questions considered in the internationally acclaimed masterpiece by the world renowned physicist - generally considered to have been one of the world s greatest thinkers. It begins by reviewing the great theories of the cosmos from Newton to Einstein, before delving into the secrets which still lie at the heart of space and time, from the Big Bang to black holes, via spiral galaxies and strong theory. To this day A Brief History of Time remains a staple of the scientific canon, and its succinct and clear language continues to introduce millions to the universe and its wonders.',
        'category_id' => 3,                
        'number_of_pages' => 126,
        'number_of_copies' => rand(0,20),
        'cover_image' => 'brief_history_of_time.jpg'               
        ]);

        //Book 6
        Book::create([
        'title' => 'Murder on the Orient Express',
        'author' => 'Agatha Christie',
        'description' => 'Murder on the Orient Express is a detective novel by British writer Agatha Christie featuring the Belgian detective Hercule Poirot. It was first published in the United Kingdom by the Collins Crime Club on 1 January 1934.[1] In the United States, it was published on 28 February 1934,[2][3] under the title of Murder in the Calais Coach, by Dodd, Mead and Company.[4][5] The U.K. edition retailed at seven shillings and sixpence (7/6)[6] and the U.S. edition at $2.00.[5]
                        The U.S. title of Murder in the Calais Coach was used to avoid confusion with the 1932 Graham Greene novel Stamboul Train which had been published in the United States as Orient Express.',
        'category_id' => 2,                
        'number_of_pages' => 450,
        'number_of_copies' => rand(0,20),
        'cover_image' => 'murder_on_the_orient.jpg',
        'file_pdf' => 'Murder_on_the_Orient_Express.pdf'  
        ]);
    }
}

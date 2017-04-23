#tabeli loomine

CREATE TABLE 10163102_loomaaed (
    id integer PRIMARY KEY auto_increment,
    nimi varchar(50),
    vanus integer,
    liik varchar(30),
    puur integer
);

#loomade lisamine

INSERT INTO 10163102_loomaaed (nimi, vanus, liik, puur) VALUES
    ('Juku', 9, 'ahv', 3),
    ('Gena', 30, 'krokodill', 1),
    ('Londiste', 2, 'elevant', 1),
    ('Kilbu', 150, 'kilpkonn', 2),
    ('Banaan', 10, 'ahv', 3);

#Hankida kõigi mingis ühes kindlas puuris elavate loomade nimi ja puuri number
SELECT nimi, puur FROM 10163102_loomaaed WHERE puur=1;

#Hankida vanima ja noorima looma vanused
SELECT MAX(vanus), MIN(vanus) FROM 10163102_loomaaed;

#hankida puuri number koos selles elavate loomade arvuga (vihjeks: group by ja count )
SELECT puur, count(*) FROM 10163102_loomaaed GROUP BY puur;

#suurendada kõiki tabelis olevaid vanuseid 1 aasta võrra
UPDATE 10163102_loomaaed SET vanus=vanus+1;
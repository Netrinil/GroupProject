Create Database If Not exists NomNomDB;
use nomnomdb;


create table if not exists Users(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 First_Name varchar(25) Not null,
 Last_Name varchar(25) Not null,
 UserId varchar(25),
 Pswd varchar(25),
 isAdmin int,
 isActive int
);


create table if not exists pages(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 Title varchar(25) Not null,
 -- Category varchar(25),
 Header1 varchar(25),
 Text1 longtext,
 ParentPage int DEFAULT 0,
 isActive int
);

-- Sample data
INSERT INTO users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (1, 'David', 'Southern', 'dSouth', 'a', 1, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'David', Last_Name = 'Southern', UserId = 'dSouth', Pswd = 'a', isAdmin = 1, isActive = 1;

INSERT INTO users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (2, 'David', 'Brockmeyer', 'dBrock', 'b', 0, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'David', Last_Name = 'Brockmeyer', UserId = 'dBrock', Pswd = 'b', isAdmin = 0, isActive = 1;

INSERT INTO users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (3,'Sakura', 'Brockmeyer', 'SBrock', 'c', 1, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'Sakura', Last_Name = 'Brockmeyer', UserId = 'SBrock', Pswd = 'c', isAdmin = 1, isActive = 1;

INSERT INTO users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (4, 'Makayla', 'Pollard', 'MPollard', 'd', 0, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'Makayla', Last_Name = 'Pollard', UserId = 'MPollard', Pswd = 'd', isAdmin = 0, isActive = 1;

-- --------------------------------------
-- Main links/pages
INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (1, 'Nom Noms', 'Home', 'Welcome to our website. Grab a bite and enjoy.', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Nom Noms', Header1 = 'Home', Text1 = 'Welcome to our website. Grab a bite and enjoy.', ParentPage = 0, isActive = 1;

INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (2, 'About', 'About Us', 'Zero score and 1 month ago, we were set upon by the reality of PHP. Now, our foe lies beneath us, broken and beaten, and lo, here we stand today to say “Let’s get this bread.”', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'About', Header1 = 'About Us', Text1 = 'Zero score and 1 month ago, we were set upon by the reality of PHP. Now, our foe lies beneath us, broken and beaten, and lo, here we stand today to say “Let’s get this bread.”', ParentPage = 0, isActive = 1;

INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (3, 'Recipe Category', 'Recipe links list', 'Recipe', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Recipe Category', Header1 = 'Recipe links list', Text1 = 'Recipe', ParentPage = 0, isActive = 1;

INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (4, 'Contact Us', 'Contact Info', 'support@nom.nom 800-366-4484 178 S Rio Grande St, Salt Lake City, UT 84101', 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact Us', Header1 = 'Contact Info', Text1 = 'support@nom.nom 800-366-4484 178 S Rio Grande St, Salt Lake City, UT 84101', ParentPage = 0, isActive = 1;

-- --------------------------------------
-- Category Pages
INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (5, 'Breakfast', 'Breakfast', 'My breakfast text. My breakfast text. My breakfast text. ', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Breakfast', Header1 = 'Breakfast', Text1 = 'My breakfast text. My breakfast text. My breakfast text. ', ParentPage = 3, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (6, 'Lunch', 'Lunch', 'My lunch text. My lunch text. My lunch text. ', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Lunch', Header1 = 'Lunch', Text1 = 'My lunch text. My lunch text. My lunch text. ', ParentPage = 3, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (7, 'Dinner', 'Dinner', 'My dinner text. My dinner text. My dinner text. ', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Dinner', Header1 = 'Dinner', Text1 = 'My dinner text. My dinner text. My dinner text. ', ParentPage = 3, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (8, 'Snacks', 'Snacks', 'My snack text. My snack text. My snack text. ', 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Snacks', Header1 = 'Snacks', Text1 = 'My snack text. My snack text. My snack text. ', ParentPage = 3, isActive = 1;

-- ---------------------
-- Sub pages
-- Note Parent Id points to the record with id=1
INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (9, 'Scrambled Egg', 'Breakfast', 'Ingredients: 1 Egg, milk, butter, salt and pepper Instruction: First, beat the eggs. Place them in a medium bowl, and whisk until the yolk and whites are thoroughly combined. 
Next, gently preheat the pan. Brush a small nonstick skillet with olive oil, or melt a little butter inside it. Warm the skillet over medium heat. Finally, cook. Pour in the egg mixture, and let it cook for a few seconds, 
undisturbed. Then, pull a rubber spatula across the bottom of the pan to form large, soft curds of scrambled eggs.'
, 5, 1)
ON DUPLICATE KEY UPDATE
Title = 'Scrambled Egg', Header1 = 'Breakfast', Text1 = 'Ingredients: 1 Egg, milk, butter, salt and pepper. Instruction: First, beat the eggs. Place them in a medium bowl, and whisk until the yolk and whites are thoroughly combined. 
Next, gently preheat the pan. Brush a small nonstick skillet with olive oil, or melt a little butter inside it. Warm the skillet over medium heat. Finally, cook. Pour in the egg mixture, and let it cook for a few seconds, undisturbed. Then, pull a rubber spatula across the bottom of the pan to form large, soft curds of scrambled eggs.', 
ParentPage = 5,  isActive = 1;

INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (10, 'Spam Musubi Onigiri', 'Lunch', 'Ingredients: 1 cup Cooked Rice, 1.5tbsp Furikake, half sheet of nori or seaweed, half can of spam, 1/4 tbsp of canola oil. Instruction: 1. Mix the furikake with the sushi rice and set aside. 2. Put the small cookie cutter through your Spam to get a cylinder. Cut the cylinder into 6 disks. You can use the rectangular leftover pieces to make the traditional Spam musubi. The bits and pieces can be used for what ever your heart desires.
 3. Over medium heat, add the Canola oil and sear both side to get a crunch (2-3 minutes on each side). 4. In the bigger cookie cutter, fill the bottom 1/3 with rice. Place spam on top and fill with rice (make sure to press down tight on the sides).
  5. Wrap the nori around the rice and you are done.', 6, 1)
ON DUPLICATE KEY UPDATE
Title = 'Spam Musubi Onigiri', Header1 = 'Lunch', Text1 = 'Ingredients: 1 cup Cooked Rice, 1.5tbsp Furikake, half sheet of nori or seaweed, half can of spam, 1/4 tbsp of canola oil, Instruction: 1. Mix the furikake with the sushi rice and set aside. 2. Put the small cookie cutter through your Spam to get a cylinder. Cut the cylinder into 6 disks. You can use the rectangular leftover pieces to make the traditional Spam musubi. The bits and pieces can be used for what ever your heart desires.
 3. Over medium heat, add the Canola oil and sear both side to get a crunch (2-3 minutes on each side). 4. In the bigger cookie cutter, fill the bottom 1/3 with rice. Place spam on top and fill with rice (make sure to press down tight on the sides).
  5. Wrap the nori around the rice and you are done', ParentPage = 6, isActive = 1;

-- Note Parent Id points to the record with id=2
INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (11, 'Beef Bulgogi', 'Dinner', 'Ingredients: 5 tablespoons soy sauce,
¼ cup chopped green onion,
2 ½ tablespoons white sugar,
2 tablespoons minced garlic,
2 tablespoons sesame seeds,
2 tablespoons sesame oil,
½ teaspoon ground black pepper,
1 pound flank steak, thinly sliced.
Instruction: 1. Whisk soy sauce, green onion, sugar, garlic, sesame seeds, sesame oil, and pepper together in a bowl.
2. Place flank steak slices in a shallow dish. Pour marinade over top. Cover and refrigerate for at least 1 hour or overnight.
3. Preheat an grill for high heat, and lightly oil the grate.
4. Quickly grill flank steak slices on the preheated grill until slightly charred and cooked through, 1 to 2 minutes per side.
5. Serve hot and enjoy!', 7, 1)
ON DUPLICATE KEY UPDATE
Title = 'Beef Bulgogi', Header1 = 'Dinner', Text1 = 'Ingredients: 5 tablespoons soy sauce,
¼ cup chopped green onion,
2 ½ tablespoons white sugar,
2 tablespoons minced garlic,
2 tablespoons sesame seeds,
2 tablespoons sesame oil,
½ teaspoon ground black pepper,
1 pound flank steak, thinly sliced. 
Instruction: 1. Whisk soy sauce, green onion, sugar, garlic, sesame seeds, sesame oil, and pepper together in a bowl.
2. Place flank steak slices in a shallow dish. Pour marinade over top. Cover and refrigerate for at least 1 hour or overnight.
3. Preheat an grill for high heat, and lightly oil the grate.
4. Quickly grill flank steak slices on the preheated grill until slightly charred and cooked through, 1 to 2 minutes per side.
5. Serve hot and enjoy!'
, ParentPage = 7, isActive = 1;

INSERT INTO pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (12, 'Pancake', 'Breakfast', 'Ingredients: 
2 cups all purpose | plain flour, (290 g | 10 oz),
1/4 cup granulated sugar or sweetener, (60g | 2 oz),
4 teaspoons baking powder,
1/4 teaspoon baking soda,
1/2 teaspoon salt,
1 3/4 cups milk, (440ml),
1/4 cup butter, (60g | 2 oz),
2 teaspoons pure vanilla extract,
1 large egg.
Instruction: 
1. Combine together the flour, sugar (or sweetener), baking powder, baking soda and salt in a large-sized bowl. Make a well in the centre and add the milk, slightly cooled melted butter, vanilla and egg.
2. Use a wire whisk to whisk the wet ingredients together first before slowly folding them into the dry ingredients. Mix together until smooth (there may be a couple of lumps but thats okay).
(The batter will be thick and creamy in consistency. If you find the batter too thick -- does not pour off the ladle or out of the measuring cup smoothly fold a couple tablespoons of extra milk into the batter at a time until reaching desired consistency).
3. Set the batter aside and allow to rest while heating up your pan or griddle. 
4. Heat a nonstick pan or griddle over low-medium heat and wipe over with a little butter to lightly grease pan. Pour ¼ cup of batter onto the pan and spread out gently into a round shape with the back of your ladle or measuring cup.
5. When the underside is golden and bubbles begin to appear on the surface, flip with a spatula and cook until golden. Repeat with remaining batter.
6. Serve with maple syrup and enjoy!',
 5, 1)
ON DUPLICATE KEY UPDATE
Title = 'Pancake', Header1 = 'Breakfast', Text1 = 'Ingredients: 2 cups all purpose | plain flour, (290 g | 10 oz),
1/4 cup granulated sugar or sweetener, (60g | 2 oz),
4 teaspoons baking powder,
1/4 teaspoon baking soda,
1/2 teaspoon salt,
1 3/4 cups milk, (440ml),
1/4 cup butter, (60g | 2 oz),
2 teaspoons pure vanilla extract,
1 large egg. 
Instruction: 
1. Combine together the flour, sugar (or sweetener), baking powder, baking soda and salt in a large-sized bowl. Make a well in the centre and add the milk, slightly cooled melted butter, vanilla and egg.
2. Use a wire whisk to whisk the wet ingredients together first before slowly folding them into the dry ingredients. Mix together until smooth (there may be a couple of lumps but thats okay).
(The batter will be thick and creamy in consistency. If you find the batter too thick -- does not pour off the ladle or out of the measuring cup smoothly fold a couple tablespoons of extra milk into the batter at a time until reaching desired consistency).
3. Set the batter aside and allow to rest while heating up your pan or griddle. 
4. Heat a nonstick pan or griddle over low-medium heat and wipe over with a little butter to lightly grease pan. Pour ¼ cup of batter onto the pan and spread out gently into a round shape with the back of your ladle or measuring cup.
5. When the underside is golden and bubbles begin to appear on the surface, flip with a spatula and cook until golden. Repeat with remaining batter.
6. Serve with maple syrup and enjoy!',
ParentPage = 5,  isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (13, 'Waffles', 'Breakfast', 'Leggo my Eggo.', 5, 1)
ON DUPLICATE KEY UPDATE
Title = 'Waffles', Header1 = 'Breakfast', Text1 = 'Leggo my Eggo.', ParentPage = 5, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (14, 'Chicken & Waffles', 'Lunch', 'Best of both', 6, 1)
ON DUPLICATE KEY UPDATE
Title = 'Chicken & Waffles', Header1 = 'Lunch', Text1 = 'Best of both', ParentPage = 6, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (15, 'Chicken', 'Dinner', "It's a bird", 7, 1)
ON DUPLICATE KEY UPDATE
Title = 'Chicken', Header1 = 'Dinner', Text1 = "It's a bird", ParentPage = 7, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (16, 'Waffles & Chicken', 'Snacks', 'Both the best', 8, 1)
ON DUPLICATE KEY UPDATE
Title = 'Waffles & Chicken', Header1 = 'Snacks', Text1 = 'Both the best', ParentPage = 8, isActive = 1;
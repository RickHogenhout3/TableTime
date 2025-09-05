-- restaurant table seeder
INSERT INTO `restaurants` (`name`, `email`, `password`, `location`, `phone`, `capacity`, `created_at`, `updated_at`) VALUES
('La Bella Vita', 'labellavita@email.com', 'hashedpassword1', 'Rome, Italy', '+39 06 1234 5678', 50, NOW(), NOW()),
('Sakura Sushi', 'sakura@email.com', 'hashedpassword2', 'Tokyo, Japan', '+81 3 5678 1234', 30, NOW(), NOW()),
('The Steakhouse', 'steakhouse@email.com', 'hashedpassword3', 'New York, USA', '+1 212 555 7890', 75, NOW(), NOW()),
('Chez Pierre', 'chezpierre@email.com', 'hashedpassword4', 'Paris, France', '+33 1 2345 6789', 40, NOW(), NOW()),
('El Rancho', 'elrancho@email.com', 'hashedpassword5', 'Madrid, Spain', '+34 91 234 5678', 60, NOW(), NOW()),
('The Green Fork', 'greenfork@email.com', 'hashedpassword6', 'Amsterdam, Netherlands', '+31 20 123 4567', 35, NOW(), NOW()),
('Dragon Wok', 'dragonwok@email.com', 'hashedpassword7', 'Beijing, China', '+86 10 8765 4321', 55, NOW(), NOW()),
('Ocean Breeze', 'oceanbreeze@email.com', 'hashedpassword8', 'Sydney, Australia', '+61 2 9876 5432', 45, NOW(), NOW()),
('Mountain Diner', 'mountaindiner@email.com', 'hashedpassword9', 'Denver, USA', '+1 303 555 6789', 80, NOW(), NOW()),
('Casa Mexicana', 'casamexicana@email.com', 'hashedpassword10', 'Mexico City, Mexico', '+52 55 1234 5678', 50, NOW(), NOW());

-- Menu items for restaurant 'La Bella Vita' (Italian)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(1, 'Spaghetti Carbonara', 'Classic Italian pasta with eggs, cheese, pancetta, and black pepper.', 12.99, 'Dinner', 0, NOW(), NOW()),
(1, 'Bruschetta', 'Toasted bread topped with fresh tomatoes, garlic, basil, and olive oil.', 8.99, 'Lunch', 0, NOW(), NOW()),
(1, 'Tiramisu', 'Traditional Italian dessert with layers of coffee-soaked ladyfingers and mascarpone cheese.', 7.99, 'Desserts', 1, NOW(), NOW());

-- Menu items for restaurant 'Sakura Sushi' (Japanese)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(2, 'Sashimi Platter', 'Assorted slices of fresh raw fish.', 24.99, 'Dinner', 0, NOW(), NOW()),
(2, 'California Roll', 'Crab, avocado, and cucumber wrapped in sushi rice and seaweed.', 14.99, 'Lunch', 0, NOW(), NOW()),
(2, 'Green Tea Ice Cream', 'Japanese green tea-flavored ice cream.', 5.99, 'Desserts', 0, NOW(), NOW());

-- Menu items for restaurant 'The Steakhouse' (American)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(3, 'Ribeye Steak', 'Juicy grilled ribeye steak with garlic butter.', 29.99, 'Dinner', 1, NOW(), NOW()),
(3, 'BBQ Burger', 'Angus beef burger with BBQ sauce, cheese, and bacon.', 14.99, 'Lunch', 0, NOW(), NOW()),
(3, 'Old Fashioned', 'Classic whiskey cocktail with bitters and orange peel.', 9.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'Chez Pierre' (French)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(4, 'Coq au Vin', 'Chicken braised with red wine, mushrooms, and onions.', 22.99, 'Dinner', 0, NOW(), NOW()),
(4, 'Croque Monsieur', 'Grilled ham and cheese sandwich with béchamel sauce.', 10.99, 'Lunch', 0, NOW(), NOW()),
(4, 'Crème Brûlée', 'French vanilla custard with a caramelized sugar top.', 8.99, 'Desserts', 1, NOW(), NOW());

-- Menu items for restaurant 'El Rancho' (Spanish)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(5, 'Paella Valenciana', 'Traditional Spanish rice dish with seafood and saffron.', 18.99, 'Dinner', 1, NOW(), NOW()),
(5, 'Tapas Selection', 'Assorted Spanish appetizers including olives, cheese, and chorizo.', 12.99, 'Lunch', 0, NOW(), NOW()),
(5, 'Sangria', 'Refreshing Spanish wine punch with fruit.', 7.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'The Green Fork' (Vegetarian)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(6, 'Vegan Buddha Bowl', 'A colorful mix of quinoa, avocado, chickpeas, and fresh veggies.', 14.99, 'Lunch', 0, NOW(), NOW()),
(6, 'Mushroom Risotto', 'Creamy risotto with wild mushrooms and truffle oil.', 17.99, 'Dinner', 0, NOW(), NOW()),
(6, 'Organic Green Smoothie', 'Spinach, banana, almond milk, and chia seeds.', 6.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'Dragon Wok' (Chinese)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(7, 'Peking Duck', 'Crispy roast duck served with pancakes, cucumber, and hoisin sauce.', 25.99, 'Dinner', 1, NOW(), NOW()),
(7, 'Dim Sum Platter', 'Selection of dumplings and buns.', 14.99, 'Lunch', 0, NOW(), NOW()),
(7, 'Jasmine Tea', 'Traditional Chinese fragrant tea.', 3.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'Ocean Breeze' (Seafood)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(8, 'Grilled Lobster', 'Freshly grilled lobster with garlic butter.', 34.99, 'Dinner', 1, NOW(), NOW()),
(8, 'Seafood Chowder', 'Creamy soup with shrimp, clams, and fish.', 12.99, 'Lunch', 0, NOW(), NOW()),
(8, 'Piña Colada', 'Tropical cocktail with coconut, pineapple, and rum.', 8.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'Mountain Diner' (American Comfort Food)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(9, 'Chicken & Waffles', 'Crispy fried chicken with fluffy waffles and maple syrup.', 15.99, 'Lunch', 0, NOW(), NOW()),
(9, 'BBQ Ribs', 'Slow-cooked ribs with tangy BBQ sauce.', 22.99, 'Dinner', 1, NOW(), NOW()),
(9, 'Hot Chocolate', 'Rich and creamy hot chocolate topped with whipped cream.', 4.99, 'Drinks', 0, NOW(), NOW());

-- Menu items for restaurant 'Casa Mexicana' (Mexican)
INSERT INTO `menus` (`restaurant_id`, `name`, `description`, `price`, `dish`, `is_special`, `created_at`, `updated_at`) VALUES
(10, 'Tacos al Pastor', 'Corn tortillas with marinated pork, pineapple, and cilantro.', 10.99, 'Lunch', 0, NOW(), NOW()),
(10, 'Mole Poblano', 'Traditional Mexican chicken dish with rich mole sauce.', 18.99, 'Dinner', 1, NOW(), NOW()),
(10, 'Margarita', 'Classic tequila cocktail with lime juice and salt.', 7.99, 'Drinks', 0, NOW(), NOW());


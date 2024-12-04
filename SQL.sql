/* For the events table */
CREATE TABLE events (
    id int AUTO_INCREMENT PRIMARY KEY,
    title varchar(50) NOT NULL, 
    topic varchar(100), 
    date DATE NOT NULL, 
    start_time TIME NOT NULL, 
    end_time TIME, 
    building_name varchar(100),
    room_number varchar(100), 
    description TEXT
); 


CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    first_name VARCHAR(50) NOT NULL,   
    last_name VARCHAR(50) NOT NULL,    
    email VARCHAR(100) NOT NULL,       
    major VARCHAR(100),                
    minor VARCHAR(100),                
    school ENUM('FCLC', 'Gabelli School of Business', 'FCRH', 'School of Professional and Continuing Studies') NOT NULL, 
    is_active BOOLEAN DEFAULT TRUE     
);


/* Fake seed Data for `members` */
INSERT INTO events (title, topic, date, start_time, end_time, building_name, room_number, description) VALUES
('Economics Seminar', 'Global Markets', '2024-12-15', '10:00:00', '12:00:00', 'Fordham Lincoln Center', '201', 'An in-depth seminar on global market trends.'),
('Career Workshop', 'Resume Building', '2024-12-18', '14:00:00', '16:00:00', 'Fordham Lincoln Center', '301', 'Workshop to build and enhance resumes for economic careers.'),
('Economic Policy Debate', 'US Fiscal Policy', '2025-01-05', '18:00:00', '20:00:00', 'Fordham Rose Hill', 'Auditorium', 'Debate on the current fiscal policy of the US government.'),
('Networking Event', 'Industry Professionals', '2024-12-22', '17:00:00', NULL, 'Gabelli School of Business', 'Conference Hall', 'Networking session with industry leaders in economics.'),
('Research Presentation', 'Sustainable Economies', '2025-01-12', '13:00:00', '15:00:00', 'Fordham Lincoln Center', '203', 'Presentation on the impact of sustainable practices on economies.'),
('Workshop', 'Machine Learning in Economics', '2025-01-10', '11:00:00', '13:00:00', 'Fordham Lincoln Center', '204', 'Hands-on workshop exploring machine learning applications in economic research.'),
('Keynote Speech', 'Future of AI in Economics', '2024-12-28', '10:00:00', '11:30:00', 'Fordham Lincoln Center', 'Main Hall', 'Keynote speech by a leading economist on the future of AI in economics.'),
('Finance Panel', 'Investment Strategies', '2025-01-08', '15:00:00', '17:00:00', 'Gabelli School of Business', 'Conference Room 1', 'Panel discussion on modern investment strategies and market analysis.');

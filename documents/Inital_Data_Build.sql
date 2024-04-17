INSERT INTO Role Values(
    1,
    'Professor'
);
INSERT INTO Tracker_User Values(
    
    1,
    'TestUser',
    'TestPassword'
);
INSERT INTO Dept (dept_name) Values(
    
    'CSCI'
);
INSERT INTO Dept (dept_name) Values(
    
    'ITS'
);
INSERT INTO Course (dept_id, course_title) Values(
    
    1,
    '223 Software Development'
);
INSERT INTO Course (dept_id, course_title) Values(
    
    1,
    '100 Python'
);
INSERT INTO Course (dept_id, course_title) Values(
    
    2,
    '224 Linux'
);
INSERT INTO Course (dept_id, course_title) Values(
    
    2,
    '277 Software Assurance'
);
INSERT INTO CourseOffering (course_id, course_term, course_year) Values(
    
    1,
    'Spring',
    2024
);
INSERT INTO CourseOffering (course_id, course_term, course_year) Values(
    
    2,
    'Spring',
    2024
);
INSERT INTO CourseOffering (course_id, course_term, course_year) Values(
    
    3,
    'Spring',
    2024
);
INSERT INTO CourseOffering (course_id, course_term, course_year) Values(
    
    4,
    'Spring',
    2024
);
INSERT INTO Textbook (course_offering_id, title, author, isbn, publisher, edition, price) Values(
    
    1,
    'Developing Software',
  'David Thomas',
  '978-1-489-03264-9',
  'GFCMSU',
  '1st Edition',
  '63.00'
);
INSERT INTO Textbook (course_offering_id, title, author, isbn, publisher, edition, price) Values(
    
    2,
    'Intro To Python',
  'Paul Deitel',
  '978-0135404676',
  'GFCMSU',
  '1st Edition',
  '100.43'
);
INSERT INTO Textbook (course_offering_id, title, author, isbn, publisher, edition, price) Values(
    3,
    'How Linux Works',
    'Brian Ward',
    '978-1718500402',
    'GFCMSU',
    '3rd Edition',
    '93.53'
);
INSERT INTO Textbook (course_offering_id, title, author, isbn, publisher, edition, price) Values(
    4,
    'Software Assurance A Complete Guide',
  'Michael Pollan',
  '978-0655917007',
  'GFCMSU',
  '1st Edition',
  '85.99'
);
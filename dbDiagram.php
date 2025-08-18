
Table students{
  id integer [primary key]
  name varchar
  email varchar [unique]
  phone varchar
  studentid varchar
  photo varchar
  address varchar
  created_at datetime
  updated_at datetime
}

Table books{
  id integer [primary key]
  title varchar
  author varchar
  cover varchar
  isbn integer
  copies integer [default: 5]
  available_copy integer
  created_at datetime
  updated_at datetime
}

Table borrowings{
  id integer [primary key]
  student_id int
  book_id int
  issue_date datetime
  return_date datetime
  status varchar [default: 'pending'] // pending, return, overdue
  created_at datetime
  updated_at datetime
}

Table reservations{
  id integer [primary key]
  student_id int
  book_id int
  borrowing_id int
  status verchar [default: 'pending'] // pending, available
  created_at datetime
  updated_at datetime
}

Ref borrowings: borrowings.student_id > students.id
Ref borrowings: borrowings.book_id > books.id
Ref reservations: reservations.borrowing_id > borrowings.id

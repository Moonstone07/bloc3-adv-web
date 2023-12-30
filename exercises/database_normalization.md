## Table 1 (dentist appointment)

| staff_num | dentist_name  |
| --------- | ------------- |
| 1011      | Tony smith    |
| 1024      | Helen Pearson |
| 1032      | Robin Plevin  |

| patient_num | patient_name  |
| ----------- | ------------- |
| 100         | Gillian White |
| 105         | Jill Bell     |
| 108         | Ian Mackay    |
| 110         | John Walker   |

| app_date | app_time | surgery_num |
| -------- | -------- | ----------- |
| 12-08-03 | 10:00    | 10          |
| 13-08-03 | 12:00    | 15          |
| 12-09-03 | 10:00    | 10          |
| 14-09-03 | 10:00    | 10          |
| 14-10-03 | 16:30    | 15          |
| 15-10-03 | 18:00    | 13          |

## Table 2 (employee contract)

| emp_num | emp_name     |
| ------- | ------------ |
| 113567  | John Smith   |
| 234111  | Diane Hocine |
| 712670  | Sarah White  |

| contract_num | total_hours_per_week_contract |
| ------------ | ----------------------------- |
| 1024         | 40                            |
| 1025         | 44                            |

| hotel_id | hotel_location |
| -------- | -------------- |
| 25       | Edinburgh      |
| 4        | Glasgow        |

| emp_num | emp_name     | total_hours_per_week |
| ------- | ------------ | -------------------- |
| 113567  | John Smith   | 32                   |
| 234111  | Diane Hocine | 24                   |
| 712670  | Sarah White  | 28                   |

## Table 3 (employee)

| emp_id | emp_name |
| ------ | -------- |
| 001    | Alice    |
| 002    | Alice    |
| 003    | Bob      |
| 004    | Bob      |

| job_code | emp_job_title |
| -------- | ------------- |
| 01       | Chef          |
| 02       | Waiter        |
| 03       | Bartender     |

| state_id | home_state |
| -------- | ---------- |
| 26       | Michigan   |
| 56       | Wyoming    |

## Table 4 (books)

| genre                   |
| ----------------------- |
| science fiction         |
| poetry                  |
| literary fiction        |
| religious autobiography |

| author        | author_nationality |
| ------------- | ------------------ |
| Jule vernes   | French             |
| Walt Whithman | American           |
| Leo Tolstoy   | Russian            |

| book_id | book_title                            |
| ------- | ------------------------------------- |
| 1       | Twenty Thousand leagues under the sea |
| 2       | Journey to the center of the earth    |
| 3       | Leaves of grass                       |
| 4       | Anna karenina                         |
| 5       | A confession                          |

## Table 5 (student) in 1nf

| date     | student_id | unit_id |
| -------- | ---------- | ------- |
| 03-02-23 | 1          | 1       |
| 02-11-18 | 1          | 2       |
| 03-02-23 | 4          | 1       |
| 03-05-05 | 2          | 5       |
| 03-07-04 | 2          | 4       |

| tut_email    | tutor_id | topic |
| ------------ | -------- | ----- |
| tut1@fhbb.ch | 1        | GMT   |
| tut3@fhbb.ch | 3        | GIn   |
| tut1@fhbb.ch | 1        | GMT   |
| tut3@fhbb.ch | 3        | PhF   |
| tut5@fhbb.ch | 5        | AVQ   |

| tutor_id | room_num |
| -------- | -------- |
| 1        | 629      |
| 3        | 631      |
| 1        | 629      |
| 3        | 632      |
| 5        | 621      |

| student_id | grade |
| ---------- | ----- |
| 1          | 4.7   |
| 1          | 5.1   |
| 4          | 4.3   |
| 2          | 4.9   |
| 2          | 5.0   |

| unit_id | book       |
| ------- | ---------- |
| 1       | Deumlich   |
| 2       | Zehnder    |
| 1       | Deumlich   |
| 5       | Dümmlers   |
| 4       | Swiss topo |

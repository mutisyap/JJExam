# JExam

## Staff
Explained in staff.md file

## Department
_For Example: Computing_
__Reason for use__
* A chairperson is tied to a department
* An administrator is tied to a department
* Results are fetched by the administrator of that department 
* Passmark may be set in a school
* assessment may be set at the school level. 


## School
__Reason for use__
* We may require to have a system administrator at the school level.
* We may need to access results at the school level.
* A single administrator may function in the whole school.
* Passmark may be set in a school
* assessment may be set at the school level. 


## Academic Year
__Reasons for use__
* Results will be fetched for a given academic year. 
* We need to close and open years as they end.
* We may need to get overal student results after their course.
* Tied to a course


## Semester
_For Example: January - May 2017_
* Exams are entered for a semester.
* ___For a given class, only one semester can be running at a time.___

## Reset
### A special table for resetting accounts. Used to reset user.

## Classes
_eg. Computer Science: Intake Sep2015_
*_NB: A student can change classes. (Repeat classes)_

## Intake
* Secifies a new class being introduced. The class thus bears that intake ID fully. 



## Unit
* A unit can have many tests: (Exam, CAT 1, CAT 2, CAT 3 ...) Defined by an assessment method.
* A unit has a passmark.
* Tied to a course. (eg. AI for computer science. Must exist inside a course)
* A unit has a semester. 
* Tied to an intake id.


## assessment
* Specifies the passmark, number of CATs, exams and the testing method.
* 

## student
* Student details. Reg Number is unique.
* Student status changes over time: {Completed, Graduated, Discontinued, Deceased}
* Students are not part of the users of the system, as at now, but could be included in future. 
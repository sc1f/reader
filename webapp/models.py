from django.db import models

# Create your models here.
class Course(models.Model):
  name = models.CharField(max_length=300, null=False)
  department = models.CharField(max_length=300, null=False)
  course_code = models.CharField(max_length=300, null=False)
  instructor = models.CharField(max_length=300, null=False)
  # TODO: refactor this to a more parsable format
  time = models.CharField(max_length=300, null=False, help_text="i.e. MWF 9-10AM")

  def __str__(self):
    return self.name

class Deadline(models.Model):
  course = models.ForeignKey(Course, on_delete=models.CASCADE)
  datetime = models.DateTimeField(verbose_name="Time", null=False, help_text="When is the deadline?")
  pass

class Document(models.Model):
  course = models.ForeignKey(Course, on_delete=models.CASCADE)
  deadline = models.ForeignKey(Deadline, on_delete=models.CASCADE)
  name = models.CharField(max_length=300, null=False)
  file = models.FileField(null=False, help_text="Upload the PDF file for reading.")

  def __str__(self):
    return self.name + " from " + self.course.name

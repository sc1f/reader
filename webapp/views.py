from django.shortcuts import render
from django.http import request, HttpResponseForbidden
from django.shortcuts import render_to_response, redirect
from django.template import RequestContext
from reader.settings import local
from .models import Course
from django.utils import timezone
from django.views.generic import FormView
from webapp.forms import CourseForm


'''
def handler404(request):
    response = render_to_response('404.html', {}, context_instance=RequestContext(request))
    response.status_code = 404
    return response

def handler500(request):
    response = render_to_response('500.html', {}, context_instance=RequestContext(request))
    response.status_code = 500
    return response
'''

def homepage(request):
  if request.user.is_authenticated:
    return redirect('/index')
  context = {
    'local': local
  }
  return render(request, 'homepage.html', context)

def index(request):
  """
  Renders the index page after the user has logged in.
  :param request:
  :return:
  """
  if not request.user.is_authenticated:
    return HttpResponseForbidden()

  context = {
    'local': local,
    'user': request.user,
    'courses': Course.objects.all(),
    'datetime': timezone.now()
  }
  return render(request, 'index.html', context)

def current_user(request):
  if not request.user.is_authenticated:
    return HttpResponseForbidden()
  context = {
    'local': local,
    'user': request.user
  }
  return render(request, 'current_user.html', context)

def course_view(request):
  pass

def document_view(request):
  pass

def deadline_view(request):
  pass

def note_view(request):
  pass

def lecture_view(request):
  pass

# Form views

class NewCourseFormView(FormView):
  form_class = CourseForm
  template_name  = 'forms/new_course.html'
  success_url = '/new/'

# API logic
def create_new_course(request):
  pass

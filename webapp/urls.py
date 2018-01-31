from django.urls import include, path
from . import views
from django.contrib.auth import views as auth_views

api_patterns = [
  path('courses/new', views.create_new_course)
]

urlpatterns = [
  path('login/', auth_views.login, name='login'),
  path('logout/', auth_views.logout, {'template_name': 'registration/logout.html'}, name='logout'),
  path('', views.homepage, name='homepage'),
  path('index/', views.index, name='index'),
  path('user/', views.current_user, name='index'),
  path('api/', include(api_patterns))
]

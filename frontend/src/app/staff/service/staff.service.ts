import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';
import { Observable, ReplaySubject } from 'rxjs';

const API_URL = `${environment.backendUrl}staff`;

@Injectable({
  providedIn: 'root'
})
export class StaffService {

  constructor(private http:HttpClient) { }

  /**
  * Function to get countries list
  */ 
   getStaffList(): Observable<any> {
    return this.http.get(`${API_URL}/list`);
  }
}

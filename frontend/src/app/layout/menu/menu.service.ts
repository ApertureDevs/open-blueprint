import { EventEmitter, Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class MenuService {

  public opened = false;
  public stateChange: EventEmitter<boolean> = new EventEmitter();

  public toogle(): void {
    this.opened = !this.opened;
    this.stateChange.emit(this.opened);
  }

  public close(): void {
    if (this.opened === false) {
      return;
    }
    this.opened = false;
    this.stateChange.emit(this.opened);
  }
}

import { Injectable } from '@angular/core';
import { MatIconRegistry } from '@angular/material/icon';
import { DomSanitizer } from '@angular/platform-browser';

@Injectable({
  providedIn: 'root',
})
export class CustomIconService {
  constructor(
    private matIconRegistry: MatIconRegistry,
    private domSanitizer: DomSanitizer,
  ) { }
  public init(): void {
    this.matIconRegistry.addSvgIcon('make', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/tools-solid.svg'));
    this.matIconRegistry.addSvgIcon('design', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/drafting-compass-solid.svg'));
    this.matIconRegistry.addSvgIcon('contribute', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/hands-helping-solid.svg'));
    this.matIconRegistry.addSvgIcon('store', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/store-alt-solid.svg'));
    this.matIconRegistry.addSvgIcon('print', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/print-solid.svg'));
    this.matIconRegistry.addSvgIcon('electronic', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/microchip-solid.svg'));
    this.matIconRegistry.addSvgIcon('official', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/medal-solid.svg'));
  }
}
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
    this.matIconRegistry.addSvgIcon('github', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/github-square-brands.svg'));
    this.matIconRegistry.addSvgIcon('twitter', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/twitter-square-brands.svg'));
    this.matIconRegistry.addSvgIcon('fork', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/code-branch-solid.svg'));
    this.matIconRegistry.addSvgIcon('issue', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/exclamation-circle-solid.svg'));
    this.matIconRegistry.addSvgIcon('difficulty', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/cogs-solid.svg'));
    this.matIconRegistry.addSvgIcon('favorite', this.domSanitizer.bypassSecurityTrustResourceUrl('../../assets/images/heart-solid.svg'));
  }
}
